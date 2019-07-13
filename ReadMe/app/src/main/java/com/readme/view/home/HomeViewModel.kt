package com.readme.view.home

import android.arch.lifecycle.LiveData
import android.arch.lifecycle.MutableLiveData
import android.arch.lifecycle.ViewModel
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

class HomeViewModel: ViewModel() {

    var mutableLiveData: MutableLiveData<List<Articles>>? = null
    val datadata: LiveData<List<Articles>>

        get() {
            if (mutableLiveData == null) {
                mutableLiveData = MutableLiveData()
                loadDataBuku()
            }
            return mutableLiveData!!
        }

    fun loadDataBuku() {
        //Define the Retrofit request//

        val requestInterface = Retrofit.Builder()

//Set the API’s base URL//

            .baseUrl(BaseUrl.baseUrl)

//Specify the converter factory to use for serialization and deserialization//

            .addConverterFactory(GsonConverterFactory.create())

//Add a call adapter factory to support RxJava return types//

            .addCallAdapterFactory(RxJava2CallAdapterFactory.create())

//Build the Retrofit instance//

            .build().create(OnlyApi::class.java)

//Add all RxJava disposables to a CompositeDisposable//

        mutableLiveData?.add(requestInterface.getArticle()

//Send the Observable’s notifications to the main UI thread//

            .observeOn(AndroidSchedulers.mainThread())

//Subscribe to the Observer away from the main UI thread//

            .subscribeOn(Schedulers.io())
            .subscribe(this::handleResponse))
    }
}


