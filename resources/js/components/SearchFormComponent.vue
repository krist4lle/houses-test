<template>
    <div class="container-fluid row p-5">
        <form class="col-6">
            <h1>Search House Form</h1>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="name" class="form-label">House Name</label>
                    <input type="text" class="form-control" id="name" v-model="name" @input="searchHouses">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label for="bedrooms" class="form-label">Bedrooms</label>
                    <input type="number" class="form-control" id="bedrooms" v-model="bedrooms" @input="searchHouses">
                </div>
                <div class="col">
                    <label for="bathrooms" class="form-label">Bathrooms</label>
                    <input type="number" class="form-control" id="bathrooms" v-model="bathrooms" @input="searchHouses">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label for="storeys" class="form-label">Storeys</label>
                    <input type="number" class="form-control" id="storeys" v-model="storeys" @input="searchHouses">
                </div>
                <div class="col">
                    <label for="garages" class="form-label">Garages</label>
                    <input type="number" class="form-control" id="garages" v-model="garages" @input="searchHouses">
                </div>
            </div>
            <div class="mb-3 row">
                <h5>Price</h5>
                <div class="col">
                    <label for="lowPrice" class="form-label">From</label>
                    <input type="number" class="form-control" id="lowPrice" v-model="lowPrice" @input="searchHouses">
                </div>
                <div class="col">
                    <label for="highPrice" class="form-label">To</label>
                    <input type="number" class="form-control" id="highPrice" v-model="highPrice" @input="searchHouses">
                </div>
            </div>
        </form>
        <div class="col-6 text-center align-content-center">
            <result-component :houses="houses"></result-component>
            <div :class="spinner"></div>
        </div>
    </div>
</template>

<script>
import ResultComponent from "./ResultComponent";

export default {
    name: "SearchFormComponent",

    components: {
        ResultComponent
    },

    data() {
      return {
          name: null,
          bedrooms: null,
          bathrooms: null,
          storeys: null,
          garages: null,
          lowPrice: null,
          highPrice: null,
          houses: null,
          spinner: 'd-none',
      }
    },

    methods: {
        searchHouses() {
            this.spinner = 'spinner-border';
            axios.post('/api/search', {
                name: this.name,
                bedrooms: this.bedrooms,
                bathrooms: this.bathrooms,
                storeys: this.storeys,
                garages: this.garages,
                lowPrice: this.lowPrice,
                highPrice: this.highPrice,
            })
                .then( response => {
                    setTimeout( () => {
                        this.houses = response.data.data.length === 0 ? null : response.data.data;
                        this.spinner = 'd-none';
                    }, 500);
                })
        }
    }
}
</script>

<style scoped>

</style>
