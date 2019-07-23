package com.readme.view.auth

import android.content.Intent
import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.util.Log
import android.widget.Toast
import com.readme.R
import com.readme.data.model.Register
import com.readme.service.api.ApiClient
import com.readme.service.api.OnlyApi
import com.readme.view.MainActivity
import kotlinx.android.synthetic.main.activity_signup.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class RegisterActivity : AppCompatActivity() {

    private lateinit var register : Register

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_signup)
        val onlyApi : OnlyApi = ApiClient.getClient().create(OnlyApi::class.java)
        val name = name.text.toString().trim()
        val email = email.text.toString().trim()
        val password = password.text.toString().trim()
        btnSignUp.setOnClickListener {
            getRegistered(onlyApi, name, email, password)
        }
    }

    override fun onBackPressed() {
        Toast.makeText(this@RegisterActivity, "Use Home to exit", Toast.LENGTH_LONG).show()
    }
    private fun getRegistered(onlyApi : OnlyApi, name: String, email: String, password: String) {
        val call : Call<Register> = onlyApi.getRegistered(name, email, password)
        call.enqueue(object : Callback<Register> {
            override fun onResponse(call: Call<Register>, response: Response<Register>) {
                register = response?.body()!!
                Log.d("TAG", "BySubjectId size ${register}")
                if (register.getStatus()=="error"){
                    Toast.makeText(this@RegisterActivity, "Please Check Your Data Filled correct", Toast.LENGTH_LONG).show()
                }else if(register.getStatus()=="success"){
                    Bundle().apply{
                        putString(getString(R.string.auth_token), register.getToken())
                    }
                    Toast.makeText(this@RegisterActivity, "Register Success", Toast.LENGTH_LONG).show()

                    startActivity(Intent(this@RegisterActivity, MainActivity::class.java))
                }
            }

            override fun onFailure(call: Call<Register>?, t: Throwable?) {
                Toast.makeText(this@RegisterActivity, "Please check your internet connection", Toast.LENGTH_LONG).show()
            }

        })
    }

}