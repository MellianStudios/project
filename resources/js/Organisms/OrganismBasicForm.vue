<template>
    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <template v-for="field in form.fields">
                                <template v-if="field.type === 'input'">
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label :for="field.key" class="block text-sm font-medium text-gray-700">{{ field.label }}</label>
                                        <input type="text" :name="field.key" :id="field.key" v-model="form_data[field.key]" :required="field.required" :disabled="field.disabled" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                </template>
                                <template v-else-if="field.type === 'select'">
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label :for="field.key" class="block text-sm font-medium text-gray-700">{{ field.label }}</label>
                                        <select :id="field.key" :name="field.key" v-model="form_data[field.key]" :required="field.required" :disabled="field.disabled" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option v-for="(option, id) in field.options" :value="id">{{ option }}</option>
                                        </select>
                                    </div>
                                </template>
                                <template v-else-if="field.type === 'tree_select'">
                                    <div class="col-span-6">
                                        <molecule-tree-select :label="field.label" :name="field.key" :options="field.options" :nested-key="field.nested_key" :selected="field.value"></molecule-tree-select>
                                    </div>
                                </template>
                            </template>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import MoleculeTreeSelect from '../Molecules/MoleculeTreeSelect';
import {Inertia} from '@inertiajs/inertia';
import {reactive} from 'vue';
import {reduce} from 'lodash';

export default {
    components: {
        MoleculeTreeSelect,
    },
    props: {
        form: Object,
    },
    data() {
        return {
            form_data: reactive(reduce(this.form.fields, function (result, value, key) {
                result[key] = value.value ?? null;
                return result;
            }, {})),
        }
    },
    methods: {
        submit() {
            Inertia[this.form.method](route(this.form.route), this.form_data);
        }
    },
    mounted() {
        for (const key in this.form.fields) {
            if (this.form.fields[key].type === 'tree_select') {
                this.emitter.on(key, option => this.form_data[key] = option.id);
            }
        }
    },
}
</script>
