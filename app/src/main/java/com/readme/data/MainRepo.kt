package com.readme.data

import android.app.Application
import android.arch.lifecycle.LiveData
import com.readme.data.model.Articles
import com.readme.service.api.BaseUrl
import com.readme.service.api.OnlyApi
import io.reactivex.android.schedulers.AndroidSchedulers
import io.reactivex.schedulers.Schedulers
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.adapter.rxjava2.RxJava2CallAdapterFactory
import retrofit2.converter.gson.GsonConverterFactory

class MainRepo(application: Application){

//    fun getAllArticles(): LiveData<List<Articles>> {
//
//        val retrofit = Retrofit.Builder()
//            .baseUrl(BaseUrl.baseUrl)
//            .addConverterFactory(GsonConverterFactory.create())
//            .build()
//
//        val apidata = retrofit.create(OnlyApi::class.java)
//        val calldata = apidata.getArticle()
//        return calldata
//    }
//////    fun insertBook(articles: Articles){
////        bookDao.insert(book)
////    }
//    fun findArticle(id: Int) : LiveData<Articles> {
//        return bookDao.find(id)
//    }
}