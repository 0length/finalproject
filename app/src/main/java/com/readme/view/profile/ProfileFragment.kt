package com.readme.view.profile

import android.content.Context
import android.content.SharedPreferences
import android.os.Bundle
import android.os.Handler
import android.support.v4.app.Fragment
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import com.madapps.liquid.LiquidRefreshLayout
import com.readme.R
import com.readme.data.model.User
import com.readme.service.api.ApiClient
import com.readme.service.api.OnlyApi
import kotlinx.android.synthetic.main.fragment_home.*
import kotlinx.android.synthetic.main.fragment_profile.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


class ProfileFragment : Fragment() {

    private lateinit var user : User

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        return inflater.inflate(R.layout.fragment_profile, container, false)

    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        val onlyApi : OnlyApi = ApiClient.getClient().create(OnlyApi::class.java)
        var preference : SharedPreferences = context!!.getSharedPreferences("Settings", Context.MODE_PRIVATE)
        val auth_token = "Bearer "+preference.getString(R.string.auth_token.toString(), null)
        getUserDetail(onlyApi, auth_token)
        profileLayoutRefresh.setOnRefreshListener(object : LiquidRefreshLayout.OnRefreshListener {
            override fun completeRefresh() {

            }

            override fun refreshing() {
                getUserDetail(onlyApi, auth_token)
                Handler().postDelayed({
                    refreshLayout.finishRefreshing()
                }, 5000)

            }
        })
    }


    private fun getUserDetail(onlyApi: OnlyApi, auth_token : String? ) {
        val call : Call<User>? = onlyApi.getUserDetail(auth_token)
        call?.enqueue(object : Callback<User> {
            override fun onFailure(call: Call<User>?, t: Throwable?) {
                Toast.makeText(context, "Please check your internet connection"+auth_token, Toast.LENGTH_LONG).show()
            }

            override fun onResponse(call: Call<User>?, response: Response<User>?) {
                user = response?.body()!!
                Log.d("TAG", "user size ${user}")
                name.text = user?.getName()
                email.text = user?.getEmail()
                joined_date.text = user?.getJoinedDate()


            }

        })

    }

}
