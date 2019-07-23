package com.readme.service.api

import com.readme.R
import com.readme.data.model.*
import retrofit2.Call
import retrofit2.http.*
import retrofit2.http.GET



interface OnlyApi {

    @GET("articles/")
    fun getArticle() : Call<List<Articles>>

    @GET("subjects/{id}")
    fun getArticleBySubjectId(@Path("id") id : String) : Call<List<Articles>>

    @GET("subjects/")
    fun getSubject() : Call<List<Subjects>>

    @GET("articles/{id}")
    fun getArticlebyid(@Path("id") id : String) : Call<Articles>

    @GET("articles/search/{keyword}")
    fun getArticlebyKeyword(@Path("keyword") id : String) : Call<List<Articles>>

    @FormUrlEncoded
    @POST("login")
    fun getLogined(
        @Field("email") email : String,
        @Field("password") password : String
    ) : Call<Login>

    @FormUrlEncoded
    @POST("register")
    fun getRegistered(
        @Field("name") name : String,
        @Field("email") email : String,
        @Field("password") password : String
    ) : Call<Register>

    @Headers("Authorization: Bearer "+R.string.auth_token)
    @GET("/tasks")
    fun getUserDetail(): Call<User>
}