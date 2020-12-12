<template>
    <div id="table-demo">
        <!-- <table-default></table-default> -->
        <!-- <table-filter-sorter></table-filter-sorter> -->
        <!-- <table-miscellaneous></table-miscellaneous> -->
    </div>
</template>

<script>
import TableDefault from "./TableDefault.vue";
import TableFilterSorter from "./TableFilterSorter.vue";
import TableMiscellaneous from "./TableMiscellaneous.vue";

export default {
    components: {
        TableDefault,
        TableFilterSorter,
        TableMiscellaneous
    }
};
</script>
