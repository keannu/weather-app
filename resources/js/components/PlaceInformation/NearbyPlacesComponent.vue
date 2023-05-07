<template>
    <div class="mt-2 overflow-auto" style="max-height:660px">
        <div v-for="oNearbyPlace in aNearbyPlaces" class="card mt-3">
            <div class="card-body text-center">
                <h5 class="card-title">{{ oNearbyPlace.name }}</h5>
                <p class="card-text">{{ oNearbyPlace.category }}</p>
            </div>
            <div class="card-footer bg-light">
                <p class="card-text p-0 m-0"><strong>Address: </strong>{{ oNearbyPlace.address }}</p>
                <p class="card-text p-0 m-0"><strong>Distance: </strong>{{ oNearbyPlace.distance }}</p>
                <p class="card-text p-0 m-0"><strong>Locality: </strong>{{ oNearbyPlace.locality }}</p>
                <p class="card-text p-0 m-0"><strong>Timezone: </strong>{{ oNearbyPlace.timezone }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'NearbyPlacesComponent',
        computed: {
            ...mapGetters('oPlaceInformation', ['aNearbyPlaces'])
        }
    }
</script>

<style>

</style>