export default {
    getData(success, error) {
        window.axios.get('/api/list')
            .then(response => {
                success(response.data);
            })
            .catch(e => {
                error(e)
            })
    },
    searchData(searchCriteria, success, error) {
        window.axios.post('/api/list', {searchCriteria:searchCriteria})
            .then(response => {
                success(response.data);
            })
            .catch(e => {
                error(e)
            })
    }

}