import axios from 'axios'

export default {
  async fetchAll() {
    return await axios.get('/posts/all')
  }
}
