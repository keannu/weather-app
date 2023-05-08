<template>
	<section class="py-5 px-2 min-vh-50">
		<div class="container px-4 px-lg-5 my-3 border" style="border-radius: 35px; background-color: #F6F1E9">
			<div class="row justify-content-center my-4">
				<div class="col-md-5 col-sm-5 mb-2">
					<select v-model="sSelectedCity" aria-label="City" class="form-select">
						<option v-for="sCity in aCitySelectOptions" :value="sCity">{{ sCity }}</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 text-center">
					<button v-if="(bIsLoading === true)" type="button" class="btn btn-secondary">Loading...</button>
					<button v-else type="button" class="btn btn-primary" @click="getPlaceInformation">Check City</button>
				</div>
			</div>
			<div v-if="(bIsLoading === false)" class="row gx-4 gx-lg-5 pb-4">
				<div class="col-md-6 mb-3">
					<h2 class="mb-4">Weather</h2>
					<WeatherComponent />
				</div>
				<div class="col-md-6 overflow-auto">
					<h2>See places you can visit</h2>
					<NearbyPlacesComponent />
				</div>
			</div>
			
			<div v-else class="d-flex justify-content-center my-5 py-5">
				<div class="spinner-border text-primary" role="status" style="width: 5rem; height: 5rem;"></div>
			</div>
		</div>
	</section>
</template>

<script>
	import WeatherComponent from './PlaceInformation/WeatherComponent'
	import NearbyPlacesComponent from './PlaceInformation/NearbyPlacesComponent'
	import { mapActions } from 'vuex';

	export default {
		name: 'IndexComponent',
		components: {
			WeatherComponent,
			NearbyPlacesComponent
		},
		data() {
			return {
				sSelectedCity: 'Tokyo',
				aCitySelectOptions: [
					'Tokyo',
					'Yokohama',
					'Kyoto',
					'Osaka',
					'Sapporo',
					'Nagoya'
				],
				bIsLoading: false
			}
		},
		created() {
			this.getPlaceInformation();
		},
		methods: {
			...mapActions('oPlaceInformation', ['fetchPlaceInformation']),

			/**
			* getPlaceInformation
			* @author Keannu Rim Kristoffer C. Regala <keannu>
			* @since 2023.05.07
			*/
			async getPlaceInformation() {
			this.bIsLoading = true;
			await this.fetchPlaceInformation(this.sSelectedCity)
			this.bIsLoading = false;
			}
		}
	}
</script>

<style>

</style>