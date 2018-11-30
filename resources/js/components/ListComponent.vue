<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">

                <div class="row">
                    <div class="col">
                        <button @click="onSearch" class="btn btn-primary form-control">search</button>
                    </div>
                    <!--<div class="col"></div>-->
                    <div class="col"><input v-model="searchCriteria.name" class="form-control form-control-sm"
                                            type="text"></div>
                    <div class="col"><input v-model="searchCriteria.bedrooms" class="form-control form-control-sm"
                                            type="number"></div>
                    <div class="col"><input v-model="searchCriteria.bathrooms" class="form-control form-control-sm"
                                            type="number"></div>
                    <div class="col"><input v-model="searchCriteria.storeys" class="form-control form-control-sm"
                                            type="number"></div>
                    <div class="col"><input v-model="searchCriteria.garages" class="form-control form-control-sm"
                                            type="number"></div>
                    <div class="col">
                        <input v-model="searchCriteria.price.from" id="price_from" class="form-control form-control-sm"
                               type="number" placeholder="from">
                        <input v-model="searchCriteria.price.to" id="price_to" class="form-control form-control-sm"
                               type="number" placeholder="to">
                    </div>
                </div>

                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Storeys</th>
                        <th>Garages</th>
                        <th>Price</th>
                    </tr>
                    <tbody v-if="hasData">
                    <tr v-for="row in dataList">
                        <td>{{row.id}}</td>
                        <td>{{row.name}}</td>
                        <td>{{row.bedrooms}}</td>
                        <td>{{row.bathrooms}}</td>
                        <td>{{row.storeys}}</td>
                        <td>{{row.garages}}</td>
                        <td>{{row.price}}</td>
                    </tr>
                    </tbody>
                    <tr v-else>
                        No data found
                    </tr>
                </table>
            </div>

        </div>
        <!--<div class="row">-->
            <!--<ul>-->
                <!--<li><a href="">prev</a></li>-->
                <!--<li><a href="">next</a></li>-->
            <!--</ul>-->
        <!--</div>-->
        <!--<div>{{searchCriteria | json}}</div>-->
    </div>
</template>

<script>
    import ListService from '../services/ListService'
    import { loadProgressBar } from 'axios-progress-bar'

    export default {
        data() {
            return {
                dataList: {},
                searchCriteria: {
                    bathrooms: '',
                    bedrooms: '',
                    storeys: '',
                    garages: '',
                    name: '',
                    price: {
                        from: '',
                        to: '',
                    }
                }
            }
        },
        computed: {
            hasData() {
                return this.dataList.length > 0;
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            getData()
            {
                ListService.getData(
                    data => this.dataList = data,
                    response => console.log(response)
                )
            },
            onSearch()
            {
                loadProgressBar()
                ListService.searchData(
                    this.searchCriteria,
                    data => {
                        this.dataList = data
                    },
                    response => console.log(response)
                )
            }
        }

    }
</script>
