<template>
    <label :for="name" class="block text-sm font-medium text-gray-700">{{ label }}</label>
    <div class="mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <button type="button" class="block py-1 px-2 w-full h-full text-left" :class="show ? 'border-b-2' : ''" @click="toggleShow">{{ selectedOption }}</button>
        <div v-if="show" class="py-1 px-2 max-h-96 overflow-scroll">
            <template v-for="option in options">
                <atom-tree-select-option :option="option" :nestedKey="nestedKey" :name="name"></atom-tree-select-option>
            </template>
        </div>
    </div>
</template>

<script>
import AtomTreeSelectOption from '../Atoms/AtomTreeSelectOption';

export default {
    components: {
        AtomTreeSelectOption,
    },
    props: {
        label: String,
        name: String,
        options: Object,
        nestedKey: String,
        selected: null,
    },
    data() {
        return {
            show: false,
            selectedOption: this.selected ? this.selected.name : 'Select',
        }
    },
    methods: {
        toggleShow() {
            this.show = !this.show;
        },
        updateSelect(option) {
            this.selectedOption = option.name;
            this.toggleShow();
        },
    },
    mounted() {
        this.emitter.on(this.name + '_select', (option) => {
            this.updateSelect(option);
            this.emitter.emit(this.name, option);
        });
    },
}
</script>
