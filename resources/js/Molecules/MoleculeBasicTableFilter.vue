<template>
    <div class="mt-4 w-full">
        <form @click.prevent="submit">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <template v-for="(filter, name) in filters">
                            <template v-if="filter.type === 'text'">
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label :for="name" class="block text-sm font-medium text-gray-700">{{ filter.label }}</label>
                                    <input type="text" :name="name" :id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                </div>
                            </template>
                            <template v-else-if="filter.type === 'tree_select'">
                                <div class="col-span-6">
                                    <molecule-tree-select :label="filter.label" :name="name" :options="filter.options" :nested-key="filter.nested_key"></molecule-tree-select>
                                </div>
                            </template>
                        </template>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import MoleculeTreeSelect from './MoleculeTreeSelect';
import {reactive} from 'vue';
import {Inertia} from '@inertiajs/inertia';
import {reduce} from 'lodash';

export default {
    components: {
        Link,
        MoleculeTreeSelect,
    },
    props: {
        filters: Object,
    },
    data() {
        return {
            form: reactive({}),
        }
    },
    methods: {
        submit() {
            Inertia.get(route(this.filters.route), this.form);
        }
    },
    mounted() {
        let test = {
            'one': {value: 'one'},
            'two': {value: 'two'},
            'three': {value: 'three'}
        };

        let result_2 = reduce(test, function (result, value, key) {
            result[key] = value.value;
        }, {})

        console.log(result_2);

        this.emitter.on('parent_category', option => this.form.parent_id = option.id);
    },
}
</script>
