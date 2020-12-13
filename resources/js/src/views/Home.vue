<template>
    <div id="demo-basic-card">
        <div class="vx-row">
            <div
                class="vx-col w-full sm:w-1/2 lg:w-1/3 mb-base"
                v-for="product in products"
                :key="product.id"
            >
                <vx-card>
                    <div slot="no-body">
                        <img
                            :src="product.image"
                            alt="content-img"
                            class="responsive card-img-top"
                        />
                    </div>
                    <h5 class="mb-2">{{ product.name }}</h5>
                    <p class="text-grey">{{ product.price }}</p>
                    <p class="text-grey">{{ product.description }}</p>
                    <div class="flex justify-between flex-wrap">
                        <vs-button
                            class="mt-4 mr-2 shadow-lg"
                            type="gradient"
                            color="#7367F0"
                            gradient-color-secondary="#CE9FFC"
                            >Download</vs-button
                        >
                        <vs-button class="mt-4" type="border" color="#b9b9b9"
                            >View All</vs-button
                        >
                    </div>
                </vx-card>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            // card 1
            products: []
        };
    },
    created() {
        // Card 1
        // this.$http
        //     .get("/api/users/pixinvent/product/1")
        //     .then(response => {
        //         this.card_1 = response.data;
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
    },
    methods: {
        updateProducts() {
            fetch("/products")
                .then(result => result.json())
                .then(rowData => {
                    this.products = rowData;
                });
        }
    },
    beforeMount() {
        this.updateProducts(); //Add cetegories in the select box
    }
};
</script>

<style lang="scss">
#demo-basic-card {
    .overlay-card {
        .vx-card__collapsible-content {
            max-height: 485px;
        }
    }

    .chat-card-log {
        height: 360px;

        .chat-sent-msg {
            background-color: #f2f4f7 !important;
        }
    }

    .card-video {
        .video-js {
            height: 370px;
        }
    }
}
</style>
