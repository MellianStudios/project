<template>
    <div class="container mx-auto w-1/2">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 md:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" v-model="form.name" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6">
                                <molecule-tree-select label="Parent category" name="parent_category" :options="category" nested-key="sub_categories"></molecule-tree-select>
                            </div>
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
import MoleculeTreeSelect from '../../../Molecules/MoleculeTreeSelect';
import {reactive} from 'vue';
import {Inertia} from '@inertiajs/inertia';

export default {
    components: {
        MoleculeTreeSelect,
    },
    props: {
        category: Object,
    },
    data() {
        return {
            form: reactive({
                name: this.category.name,
                parent_id: this.category.parent_id,
            }),
        }
    },
    methods: {
        submit() {
            Inertia.put(route('admin.categories.update', this.category.id), this.form);
        }
    },
    mounted() {
        this.emitter.on('parent_category', option => this.form.parent_id = option.id);
    },
}
</script>
