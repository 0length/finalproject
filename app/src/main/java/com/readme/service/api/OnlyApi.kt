package com.readme.service.api

import android.arch.lifecycle.LiveData
import com.readme.data.model.Articles
import com.readme.data.model.Subjects
import io.reactivex.Observable
import retrofit2.Call
import retrofit2.http.GET

interface OnlyApi {
//    @GET("/subjects")
//    fun getSubject() : Observable<List<Subjects>>

    @GET("articles/")
    fun getArticle() : Call<List<Articles>>

    @GET("subjects/")
    fun getSubject() : Call<List<Subjects>>
}