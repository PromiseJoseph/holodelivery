 import axios from "axios";
 import store from "./store"

 const axiosClient = axios.create({
   withCredentials:true,
   //  withXSRFToken:true,
   //  xsrfCookieName:"XSRF-TOKEN",
   //  xsrfHeaderName:"X-XSRF-TOKEN",
    baseURL:`http://localhost:8000/`,
    headers: {
      "Content-Type": 'application/json',
      Accept: 'application/json'
   },
  })


//  axiosClient.interceptors.request.use(config =>{
//    const token = decodeURIComponent(document.cookie.replace('XSRF-TOKEN=', ''));
//    axiosClient.defaults.headers['X-XSRF-TOKEN'] = token;
 
//    return config;
//  });
//  axiosClient.interceptors.response.use(response=>{
//     return response
//  },error => {
//     throw error;
    
//  })  
//  axios.defaults.headers.common['Authorization'] = `Bearer ${accessToken}`;





 export default axiosClient