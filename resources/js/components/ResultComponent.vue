<template>
    <div v-if="houses === null">
        <h2>No Results</h2>
    </div>
    <table class="table" v-if="houses !== null">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">House Name</th>
            <th scope="col">Price</th>
            <th scope="col">Bedrooms</th>
            <th scope="col">Bathrooms</th>
            <th scope="col">Storeys</th>
            <th scope="col">Garages</th>
        </tr>
        </thead>
        <tbody v-for="house in houses">
        <tr>
            <th scope="row">{{ house.id }}</th>
            <td>{{ house.name }}</td>
            <td>{{ house.price }}</td>
            <td>{{ house.bedrooms }}</td>
            <td>{{ house.bathrooms }}</td>
            <td>{{ house.storeys }} </td>
            <td>{{ house.garages }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "ResultComponent",

    props: ['houses'],
}
</script>

<style scoped>

</style>
