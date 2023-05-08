<template>
    <section style="background-color: #06283D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-8 col-lg-10 col-md-11 col-sm-10">
                    <div class="card" style="color: #4B515D; border-radius: 35px;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <h6 class="flex-grow-1">{{ sCurrentDate }}</h6>
                            </div>
                            <div class="d-flex flex-column text-center mt-5 mb-4">
                                <div class="display-1">
                                    <b-icon-cloud v-if="(sWeatherMain === 'Clouds')"></b-icon-cloud>
                                    <b-icon-cloud-drizzle v-else-if="(sWeatherMain === 'Drizzle')"></b-icon-cloud-drizzle>
                                    <b-icon-cloud-lightning-rain v-else-if="(sWeatherMain === 'Thunderstorm')"></b-icon-cloud-lightning-rain>
                                    <b-icon-sunrise v-else-if="(sWeatherMain === 'Clear')"></b-icon-sunrise>
                                    <b-icon-snow v-else-if="(sWeatherMain === 'Snow')"></b-icon-snow>
                                    <b-icon-cloud-rain v-else-if="(sWeatherMain === 'Rain')"></b-icon-cloud-rain>
                                    <b-icon-three-dots v-else></b-icon-three-dots>
                                </div>
                                <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;">{{ oWeather.temp }}</h6>
                                <span class="h5" style="color: #868B94">{{ sWeatherMain }}</span>
                                <span class="small" style="color: #868B94">{{ oWeather.type.description || '' }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 py-0 my-0" style="font-size: 1rem;">
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Wind Speed: </strong>{{ oWeather.wind_speed }}</p>
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Wind Degree: </strong>{{ oWeather.wind_deg }}</p>
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Humidity: </strong>{{ oWeather.humidity }}</p>
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Cloudiness: </strong>{{ oWeather.cloud }}</p>
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Min Temperature: </strong>{{ oWeather.temp_min }}</p>
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Max Temperature: </strong>{{ oWeather.temp_max }}</p>
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Rain Volume (1h): </strong>{{ oWeather.rain }}</p>
                                    <p class="py-0 my-0 fs-6"><strong class="ms-1">Snow Volume (1h): </strong>{{ oWeather.snow }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'WeatherComponent',
        computed: {
            ...mapGetters('oPlaceInformation', ['oWeather']),

            /**
             * sCurrentDate
             * @author Keannu Rim Kristoffer C. Regala <keannu>
             * @since 2023.05.07
             * @return string
             */
            sCurrentDate() {
                return new Date().toDateString();
            },

            /**
             * sWeatherMain
             * @author Keannu Rim Kristoffer C. Regala <keannu>
             * @since 2023.05.07
             * @return string
             */
            sWeatherMain() {
                return (!!this.oWeather.type.main === true) ? this.oWeather.type.main : '';
            }
        }
    }
</script>

<style>

</style>