<template>
    <tr
        class="accordion border-b border-grey-light hover:bg-gray-100 text-sm"
        :class="{ clickable: rowClickable }"
        @click="onClick"
    >
        <td class="table-cell px-3 py-4" :class="{}">
            <slot></slot>
        </td>
        <table-cell
            v-for="(column, index) in visibleColumns"
            :row="row"
            :column="column"
            :key="index"
        ></table-cell>
    </tr>
</template>

<script>
import TableCell from "./tableCell";

export default {
    props: ["columns", "row", "rowClickable"],

    components: {
        TableCell,
    },

    computed: {
        visibleColumns() {
            return this.columns.filter(
                (column) => !column.hidden,
            );
        },
    },
    created() {
        // console.log("column", this.columns);
    },
    methods: {
        onClick() {
            if (this.rowClickable) {
                this.$emit("clicked", this.row);
            }
        },
    },
};
</script>

<style>
tr.clickable {
    cursor: pointer;
}
</style>
