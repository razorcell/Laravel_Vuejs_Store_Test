<!-- =========================================================================================
    File Name: InputDefault.vue
    Description: Default input using vs-input
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
    <vx-card title="Add Product" code-toggler>
        <span></span>

        <div class="demo-alignment">
            <vs-input
                class="inputx"
                placeholder="Placeholder"
                v-model="value1"
            />
            <vs-input
                disabled
                class="inputx"
                placeholder="Disabled"
                v-model="value2"
            />
        </div>
    </vx-card>
</template>

<script>
export default {
    data() {
        return {
            value1: "",
            value2: ""
        };
    }
};
</script>
