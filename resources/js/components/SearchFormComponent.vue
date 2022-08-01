<template>
    <div class="container-fluid row p-5">
        <form class="col-6">
            <h1>Search House Form</h1>
            <div class="mb-3 row">
                <div class="col-6">
                    <label for="name" class="form-label">House Name</label>
                    <input type="text" class="form-control" id="name" v-model="name">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label for="bedrooms" class="form-label">Bedrooms</label>
                    <input type="number" class="form-control" id="bedrooms" v-model="bedrooms">
                </div>
                <div class="col">
                    <label for="bathrooms" class="form-label">Bathrooms</label>
                    <input type="number" class="form-control" id="bathrooms" v-model="bathrooms">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label for="storeys" class="form-label">Storeys</label>
                    <input type="number" class="form-control" id="storeys" v-model="storeys">
                </div>
                <div class="col">
                    <label for="garages" class="form-label">Garages</label>
                    <input type="number" class="form-control" id="garages" v-model="garages">
                </div>
            </div>
            <div class="mb-3 row">
                <h5>Price</h5>
                <div class="col">
                    <label for="lowPrice" class="form-label">From</label>
                    <input type="number" class="form-control" id="lowPrice" v-model="lowPrice">
                </div>
                <div class="col">
                    <label for="highPrice" class="form-label">To</label>
                    <input type="number" class="form-control" id="highPrice" v-model="highPrice">
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "SearchFormComponent",

    data() {
      return {
          name: null,
          bedrooms: null,
          bathrooms: null,
          storeys: null,
          garages: null,
          lowPrice: null,
          highPrice: null,
      }
    },
}
</script>

<style scoped>

</style>
