package com.readme.view.home

import android.app.Application
import android.arch.lifecycle.AndroidViewModel
import android.arch.lifecycle.LiveData
import android.arch.lifecycle.MediatorLiveData
import android.arch.lifecycle.MutableLiveData
import com.readme.data.model.Articles
import com.readme.data.model.Subjects
import com.readme.service.api.BaseUrl
import com.readme.service.api.OnlyApi
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory


class HomeViewModel(application : Application) : AndroidViewModel(application) {
    var articleList : MutableLiveData<List<Articles>>? = null
    var subjectList : MutableLiveData<List<Subjects>>? = null
    val dataArticle : LiveData<List<Articles>>
        get() {
            if(articleList == null){
                articleList = MutableLiveData()
                getAllArtices()
            }
            return articleList!!
        }
    val dataSubject : LiveData<List<Subjects>>
        get() {
            if(subjectList == null){
                subjectList = MutableLiveData()
                getAllSubjects()
            }
            return subjectList!!
        }
    init {
        getAllArtices()
    }


    fun getAllArtices(){
        val retrofit = Retrofit.Builder()
            .baseUrl(BaseUrl.baseUrl)
            .addConverterFactory(GsonConverterFactory.create())
            .build()

        val apidata = retrofit.create(OnlyApi::class.java)
        val calldata = apidata.getArticle()
        calldata.enqueue(object : Callback<List<Articles>> {
            override fun onResponse(call: Call<List<Articles>>, response: Response<List<Articles>>) {
                articleList?.value = response.body()
            }

            override fun onFailure(call: Call<List<Articles>>, t: Throwable) {

            }

        })
    }

    fun getAllSubjects(){
        val retrofit = Retrofit.Builder()
            .baseUrl(BaseUrl.baseUrl)
            .addConverterFactory(GsonConverterFactory.create())
            .build()

        val apidata = retrofit.create(OnlyApi::class.java)
        val calldata = apidata.getSubject()
        calldata.enqueue(object : Callback<List<Subjects>> {
            override fun onResponse(call: Call<List<Subjects>>, response: Response<List<Subjects>>) {
                subjectList?.value = response.body()
            }

            override fun onFailure(call: Call<List<Subjects>>, t: Throwable) {

            }

        })
    }

}



