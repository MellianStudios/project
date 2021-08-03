<template>
    <button type="button" class="w-full text-left" @click="emitClick">{{ option.name }}</button>
    <template v-if="option[nestedKey].length > 0">
        <div class="ml-4">
            <template v-for="sub_option in option[nestedKey]">
                <atom-tree-select-option :option="sub_option" :nestedKey="nestedKey" :name="name"></atom-tree-select-option>
            </template>
        </div>
    </template>
</template>

<script>
export default {
    props: {
        option: Object,
        nestedKey: String,
        name: String,
    },
    methods: {
        emitClick() {
            this.emitter.emit(this.name + '_select', this.option);
        }
    }
}
</script>
