package com.readme.service.api

import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

class ApiClient {
    companion object {
        fun getClient() : Retrofit {
            val retrofit: Retrofit = Retrofit.Builder().
                baseUrl(BaseUrl.baseUrl+BaseUrl.apiPath).
                addConverterFactory(GsonConverterFactory.create())
                .build()

            return retrofit
        }
    }
}