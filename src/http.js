import axios from 'axios'

export const http = axios.create({
    baseURL: 'public/my_entry.php'
    /*baseURL: 'my_entry.php'*/
})