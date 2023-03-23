<template>
    <div class="container-fluid mt-5 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-2">Search for your favourite person.</div>

                <div class="input-group mb-3" style="max-width: 300px;">
                    <input
                        type="search"
                        id="searchbar"
                        class="form-control"
                        placeholder="Enter a name..."
                        aria-label="Enter a name..."
                        aria-describedby="searchBtn"
                        ref="searchbar"
                    >
                    <button class="btn btn-primary" type="button" @click="searchPerson()">Button</button>
                </div>

                <span class="bg-success text-white d-block mb-3 p-2" style="max-width: 300px;">{{ search }}</span>

                <div class="mb-2">Here you can view a list of your favourite items.</div>
                <div class="mt-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="people-tab" data-bs-toggle="tab" data-bs-target="#people-tab-pane" type="button" role="tab" aria-controls="people-tab-pane" aria-selected="true">People</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="planets-tab" data-bs-toggle="tab" data-bs-target="#planets-tab-pane" type="button" role="tab" aria-controls="planets-tab-pane" aria-selected="false">Planets</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="starships-tab" data-bs-toggle="tab" data-bs-target="#starships-tab-pane" type="button" role="tab" aria-controls="starships-tab-pane" aria-selected="false">Starships</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="people-tab-pane" role="tabpanel" aria-labelledby="people-tab" tabindex="0">
                            <ul style="list-style-type: none; padding-left: 0;" class="mt-3">
                                <li v-for="listPerson in listPeople" :key="listPerson.id" class="mb-1">{{ listPerson.name }}</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="planets-tab-pane" role="tabpanel" aria-labelledby="planets-tab" tabindex="0">
                            <ul style="list-style-type: none; padding-left: 0;" class="mt-3">
                                <li v-for="listPlanet in listPlanets" :key="listPlanet.id" class="mb-1">{{ listPlanet.name }}</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="starships-tab-pane" role="tabpanel" aria-labelledby="starships-tab" tabindex="0">
                            <ul style="list-style-type: none; padding-left: 0;" class="mt-3">
                                <li v-for="listStarship in listStarships" :key="listStarship.id" class="mb-1">{{ listStarship.name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Homepage",

        data() {
            return {
                listPlanets: [],
                listPeople: [],
                listStarships: [],

                search: '',
            };
        },

        mounted() {
            this.loadPeople();
            this.loadPlanets();
            this.loadStarships();
        },

        methods: {
            loadPeople: async function() {
                const baseURL = process.env.MIX_API_URL;

                axios.get(baseURL + '/user/list/people')
                    .then((response) => {
                        this.listPeople = response.data.people.results;
                    })
                    .catch((error) => {
                        // console.log(error);
                    });
            },

            loadPlanets: async function() {
                const baseURL = process.env.MIX_API_URL;

                axios.get(baseURL + '/user/list/planets')
                .then((response) => {
                    this.listPlanets = response.data.planets.results;
                })
                .catch((error) => {
                    // console.log(error);
                });
            },

            loadStarships: async function() {
                const baseURL = process.env.MIX_API_URL;

                axios.get(baseURL + '/user/list/starships')
                    .then((response) => {
                        this.listStarships = response.data.starships.results;
                    })
                    .catch((error) => {
                        // console.log(error);
                    });
            },

            searchPerson: async function() {
                const baseURL = process.env.MIX_API_URL;

                let search = this.$refs.searchbar.value;

                axios.get(baseURL + '/user/list/people/search='+search)
                    .then((response) => {
                        this.search = response.data.person.results[0].name;
                    })
                    .catch((error) => {
                        this.search = 'No results found';
                    });
            }
        }
    }
</script>
