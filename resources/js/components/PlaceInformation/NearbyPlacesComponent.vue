<template>
    <div class="mt-2 overflow-auto" style="max-height:660px">
        <div v-if="(iNearbyPlacesCount > 0)" class="text-center">
            <div v-for="oNearbyPlace in aNearbyPlaces" class="card mt-3">
                <div class="card-body text-center" style="background-color: #CFB997;">
                    <h5 class="card-title">{{ oNearbyPlace.name }}</h5>
                    <p class="card-text">{{ oNearbyPlace.category }}</p>
                </div>
                <div class="card-footer">
                    <p class="card-text p-0 m-0"><strong>Address: </strong>{{ oNearbyPlace.address }}</p>
                    <p class="card-text p-0 m-0"><strong>Distance: </strong>{{ oNearbyPlace.distance }}</p>
                    <p class="card-text p-0 m-0"><strong>Locality: </strong>{{ oNearbyPlace.locality }}</p>
                    <p class="card-text p-0 m-0"><strong>Timezone: </strong>{{ oNearbyPlace.timezone }}</p>
                </div>
            </div>
        </div>

        <div v-else class="text-center">
            <p class="h5 mt-3">No nearby place found...</p>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'NearbyPlacesComponent',
        computed: {
            ...mapGetters('oPlaceInformation', ['aNearbyPlaces']),

            /**
             * sWeatherMain
             * @author Keannu Rim Kristoffer C. Regala <keannu>
             * @since 2023.05.07
             * @return string
             */
            iNearbyPlacesCount() {
                return this.aNearbyPlaces.length;
            }
        }
    }
</script>

<style>

</style>