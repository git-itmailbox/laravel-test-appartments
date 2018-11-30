export default {
    getData(success, error) {
        window.axios.get('/api/list')
            .then(response => {
                success(response.data);
            })
            .catch(e => {
                error(e)
            })
    }
}