<!-- =========================================================================================
    File Name: AgGridTable.vue
    Description: Ag Grid table
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
    <div id="ag-grid-demo">
        <vx-card title="Add" code-toggler>
            <div class="vx-row mb-6">
                <div class="vx-col sm:w-1/3 w-full">
                    <span>Name</span>
                </div>
                <div class="vx-col sm:w-2/3 w-full">
                    <vs-input class="w-full" v-model="name" />
                </div>
            </div>
            <div class="vx-row mb-6">
                <div class="vx-col sm:w-1/3 w-full">
                    <span>Description</span>
                </div>
                <div class="vx-col sm:w-2/3 w-full">
                    <vs-input
                        class="w-full"
                        type="email"
                        v-model="description"
                    />
                </div>
            </div>
            <div class="vx-row mb-6">
                <div class="vx-col sm:w-1/3 w-full">
                    <span>Price</span>
                </div>
                <div class="vx-col sm:w-2/3 w-full">
                    <vs-input class="w-full" v-model="price" />
                </div>
            </div>
            <div class="vx-row mb-6">
                <div class="vx-col sm:w-1/3 w-full">
                    <span>Image URL</span>
                </div>
                <div class="vx-col sm:w-2/3 w-full">
                    <vs-input class="w-full" v-model="imageUrl" />
                </div>
            </div>
            <div class="vx-row mb-6">
                <div class="vx-col sm:w-1/3 w-full">
                    <span>Category</span>
                </div>
                <div class="vx-col sm:w-2/3 w-full">
                    <v-select
                        :options="categories"
                        :dir="$vs.rtl ? 'rtl' : 'ltr'"
                        v-model="category_id"
                    />
                </div>
            </div>

            <div class="vx-row">
                <div class="vx-col sm:w-2/3 w-full ml-auto">
                    <vs-button class="mr-3 mb-2" @click="addProduct"
                        >Submit</vs-button
                    >
                    <vs-button
                        color="warning"
                        type="border"
                        class="mb-2"
                        @click="
                            name = description = price = imageUrl = category =
                                ''
                        "
                        >Reset</vs-button
                    >
                </div>
            </div>
        </vx-card>
        <vx-card>
            <!-- TABLE ACTION ROW -->
            <div class="flex flex-wrap justify-between items-center">
                <!-- ITEMS PER PAGE -->
                <div class="mb-4 md:mb-0 mr-4 ag-grid-table-actions-left">
                    <vs-dropdown vs-trigger-click class="cursor-pointer">
                        <div
                            class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium"
                        >
                            <span class="mr-2">
                                {{
                                    currentPage * paginationPageSize -
                                        (paginationPageSize - 1)
                                }}
                                -
                                {{
                                    this.rowData.length -
                                        currentPage * paginationPageSize >
                                    0
                                        ? currentPage * paginationPageSize
                                        : this.rowData.length
                                }}
                                of {{ this.rowData.length }}
                            </span>
                            <feather-icon
                                icon="ChevronDownIcon"
                                svgClasses="h-4 w-4"
                            />
                        </div>
                        <!-- <vs-button class="btn-drop" type="line" color="primary" icon-pack="feather" icon="icon-chevron-down"></vs-button> -->
                        <vs-dropdown-menu>
                            <vs-dropdown-item
                                @click="gridApi.paginationSetPageSize(5)"
                            >
                                <span>5</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item
                                @click="gridApi.paginationSetPageSize(10)"
                            >
                                <span>10</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item
                                @click="gridApi.paginationSetPageSize(20)"
                            >
                                <span>20</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item
                                @click="gridApi.paginationSetPageSize(100)"
                            >
                                <span>100</span>
                            </vs-dropdown-item>
                        </vs-dropdown-menu>
                    </vs-dropdown>
                </div>

                <!-- TABLE ACTION COL-2: SEARCH & EXPORT AS CSV -->
                <div
                    class="flex flex-wrap items-center justify-between ag-grid-table-actions-right"
                >
                    <vs-input
                        class="mb-4 md:mb-0 mr-4"
                        v-model="searchQuery"
                        @input="updateSearchQuery"
                        placeholder="Search..."
                    />
                    <vs-button
                        class="mb-4 md:mb-0"
                        @click="gridApi.exportDataAsCsv()"
                        >Export as CSV</vs-button
                    >
                    <vs-button
                        color="danger"
                        type="filled"
                        class="mb-4 md:mb-0 ml-4"
                        @click="deleteProduct"
                        >Delete</vs-button
                    >
                </div>
            </div>
            <ag-grid-vue
                ref="agGridTable"
                :gridOptions="gridOptions"
                class="ag-theme-material w-100 my-4 ag-grid-table"
                :columnDefs="columnDefs"
                :defaultColDef="defaultColDef"
                rowSelection="single"
                :rowData="rowData"
                colResizeDefault="shift"
                :animateRows="true"
                :floatingFilter="true"
                :pagination="true"
                :paginationPageSize="paginationPageSize"
                :suppressPaginationPanel="true"
                :enableRtl="$vs.rtl"
            >
            </ag-grid-vue>
            <vs-pagination
                :total="totalPages"
                :max="maxPageNumbers"
                v-model="currentPage"
            />
        </vx-card>
    </div>
</template>

<script>
import DropdownOptionsBasic from "../../components/select/dropdown-options/DropdownOptionsBasic.vue";
import vSelect from "vue-select";
import InputDefault from "./InputDefault.vue";
import { AgGridVue } from "ag-grid-vue";

import "@sass/vuexy/extraComponents/agGridStyleOverride.scss";

export default {
    components: {
        DropdownOptionsBasic,
        "v-select": vSelect,
        InputDefault,
        AgGridVue
    },
    data() {
        return {
            pagination: true,
            categories: [],
            name: "",
            description: "",
            price: "",
            imageUrl: "",
            category_id: null,
            rowModelType: "serverSide",
            rowData: [],
            searchQuery: "",
            gridOptions: {},
            maxPageNumbers: 7,
            gridApi: null,
            defaultColDef: {
                sortable: true,
                editable: true,
                resizable: true,
                suppressMenu: true
            },
            columnDefs: [
                {
                    headerName: "ID",
                    field: "id",
                    filter: true,
                    checkboxSelection: true,
                    headerCheckboxSelectionFilteredOnly: true,
                    headerCheckboxSelection: true
                    // width: 175
                },
                {
                    headerName: "Name",
                    field: "name",
                    filter: true
                    // width: 175
                },
                {
                    headerName: "Description",
                    field: "description",
                    filter: true
                    // width: 250
                    // pinned: "left"
                },
                {
                    headerName: "Price",
                    field: "price",
                    filter: true
                    // width: 250
                },
                {
                    headerName: "Category_id",
                    field: "category_id",
                    filter: true
                    // width: 150
                }
            ]
            // contacts
        };
    },
    watch: {
        "$store.state.windowWidth"(val) {
            if (val <= 576) {
                this.maxPageNumbers = 4;
                this.gridOptions.columnApi.setColumnPinned("email", null);
            } else this.gridOptions.columnApi.setColumnPinned("email", "left");
        }
    },
    computed: {
        paginationPageSize() {
            if (this.gridApi) return this.gridApi.paginationGetPageSize();
            else return 8;
        },
        totalPages() {
            if (this.gridApi) return this.gridApi.paginationGetTotalPages();
            else return 0;
        },
        currentPage: {
            get() {
                if (this.gridApi)
                    return this.gridApi.paginationGetCurrentPage() + 1;
                else return 1;
            },
            set(val) {
                this.gridApi.paginationGoToPage(val - 1);
            }
        }
    },
    methods: {
        updateSearchQuery(val) {
            this.gridApi.setQuickFilter(val);
        },
        addProduct() {
            var formdata = new FormData();
            formdata.append("name", this.name);
            formdata.append("description", this.description);
            formdata.append("price", this.price);
            formdata.append("image", this.imageUrl);
            formdata.append("category_id", this.category_id.value);
            fetch("/api/products", {
                method: "POST",
                body: formdata
            })
                .then(result => result.text())
                .then(result => {
                    console.log(result);
                    this.updateProducts();
                    this.$vs.notify({
                        title: "Product",
                        text: "Add success",
                        color: "success"
                    });
                });
        },
        updateProducts() {
            fetch("/products")
                .then(result => result.json())
                .then(rowData => {
                    this.gridApi.setRowData(rowData);
                });
        },
        updateCategories() {
            fetch("/categories")
                .then(result => result.json())
                .then(
                    rowData =>
                        (this.categories = rowData.map(cat => {
                            return { label: cat.name, value: cat.id };
                        }))
                );
        },
        deleteProduct() {
            const to_be_deleted = this.gridApi.getSelectedRows().shift();
            fetch(`/api/products/${to_be_deleted.id}`, {
                method: "DELETE"
            })
                .then(result => result.text())
                .then(result => {
                    console.log(result);
                    this.updateProducts();
                    this.$vs.notify({
                        title: "Product",
                        text: "Delete success",
                        color: "success"
                    });
                });
        }
    },
    mounted() {
        this.gridApi = this.gridOptions.api; //Easy access to Grip API
        this.updateProducts();
        /* =================================================================
      NOTE:
      Header is not aligned properly in RTL version of agGrid table.
      However, we given fix to this issue. If you want more robust solution please contact them at gitHub
    ================================================================= */
        if (this.$vs.rtl) {
            const header = this.$refs.agGridTable.$el.querySelector(
                ".ag-header-container"
            );
            header.style.left = `-${String(
                Number(header.style.transform.slice(11, -3)) + 9
            )}px`;
        }
    },
    beforeMount() {
        this.updateCategories(); //Add cetegories in the select box
    }
};
</script>
