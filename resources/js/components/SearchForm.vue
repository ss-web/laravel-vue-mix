<template>
	<el-aside width="200px" style="padding: 20px;">
    <el-form :model="properties" ref="searchForm" label-position="top" @submit.prevent="submitSearch">
      <el-form-item label="Name">
        <el-input v-model="properties.name" placeholder="Search"></el-input>
      </el-form-item>

      <el-form-item label="Bedrooms">
        <el-input-number v-model="properties.bedrooms" :min="0" :max="10"></el-input-number>
      </el-form-item>

      <el-form-item label="Bathrooms">
        <el-input-number v-model="properties.bathrooms" :min="0" :max="10"></el-input-number>
      </el-form-item>

      <el-form-item label="Storeys">
        <el-input-number v-model="properties.storeys" :min="0" :max="10"></el-input-number>
      </el-form-item>

      <el-form-item label="Garages">
        <el-input-number v-model="properties.garages" :min="0" :max="10"></el-input-number>
      </el-form-item>

      <el-form-item label="Price Min">
        <el-input-number v-model="properties.priceMin" :min="0"></el-input-number>
      </el-form-item>

      <el-form-item label="Price Max">
        <el-input-number v-model="properties.priceMax" :min="0"></el-input-number>
      </el-form-item>

      <el-form-item class="mt-2">
        <el-button type="primary" native-type="submit">Search</el-button>
      </el-form-item>
    </el-form>
  </el-aside>

	<el-main>
		<el-divider></el-divider>
		<div v-if="loading">Searching...</div>

		<div v-if="results.length > 0">
			<el-table :data="results" style="width: 100%">
				<el-table-column prop="name" label="Name"></el-table-column>
				<el-table-column prop="price" label="Price"></el-table-column>
				<el-table-column prop="bedrooms" label="Bedrooms"></el-table-column>
				<el-table-column prop="bathrooms" label="Bathrooms"></el-table-column>
				<el-table-column prop="storeys" label="Storeys"></el-table-column>
				<el-table-column prop="garages" label="Garages"></el-table-column>
			</el-table>
		</div>

		<div v-if="results.length === 0 && !loading">No results found.</div>
	</el-main>
</template>

<script>
export default {
	data() {
		return {
			properties: {
				name: '',
				bedrooms: 4,
				bathrooms: 2,
				storeys: 2,
				garages: 2,
				priceMin: 374662,
				priceMax: 374662,
				loading: false
			},
			results: []
		};
	},
	methods: {
		submitSearch() {
			this.loading = true;

			axios.get('/api/search', { params: { ...this.properties } })
				.then(response => {
					this.results = response.data?.results || [];
					this.loading = false;
				})
				.catch(error => {
					console.error('Error fetching search results:', error);
					this.loading = false;
				});
		},
	},
};
</script>
