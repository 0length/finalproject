package com.readme.view.auth


import android.animation.ArgbEvaluator
import android.animation.ObjectAnimator
import android.animation.ValueAnimator
import android.content.Intent
import android.os.Bundle
import android.support.v4.content.ContextCompat
import android.support.v7.app.AppCompatActivity
import android.util.Log
import android.widget.Toast
import com.readme.R
import com.readme.data.model.Login
import com.readme.service.api.ApiClient
import com.readme.service.api.OnlyApi
import com.readme.view.MainActivity
import kotlinx.android.synthetic.main.activity_login.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import android.content.SharedPreferences
import android.content.Context






class LoginActivity : AppCompatActivity() {

    private lateinit var login : Login


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)
        val objAnimator = ObjectAnimator.ofObject(
            container,
            "backgroundColor",
            ArgbEvaluator(),
            ContextCompat.getColor(this, R.color.colorPrimary),
            ContextCompat.getColor(this, R.color.colorPrimaryDark)
        )

        objAnimator.repeatCount = 50
        objAnimator.repeatMode = ValueAnimator.REVERSE

        objAnimator.duration = 2500L
        objAnimator.start()

        val onlyApi : OnlyApi = ApiClient.getClient().create(OnlyApi::class.java)

        btnLogin.setOnClickListener {
            val email = email.text.toString().trim()
            val password = password.text.toString().trim()
            if (email.isEmpty()||password.isEmpty()) {
                Toast.makeText(this@LoginActivity, "Please Check Your Data Filled correct", Toast.LENGTH_LONG).show()
            }else {
                getLogined(onlyApi, email, password)
            }

        }

        btnSignUp.setOnClickListener {
            startActivity(Intent(this@LoginActivity, RegisterActivity::class.java))
        }
    }
    override fun onBackPressed() {
        Toast.makeText(this@LoginActivity, "Use Home to exit", Toast.LENGTH_LONG).show()
    }
    private fun getLogined(onlyApi: OnlyApi, email : String, password : String) {
        val call : Call<Login>? = onlyApi.getLogined(email, password)
        call?.enqueue(object : Callback<Login> {
            override fun onResponse(call: Call<Login>, response: Response<Login>?) {
                login = response?.body()!!
                Log.d("TAG", "BySubjectId size ${login}")
                if (login.getStatus()=="error"){
                    Toast.makeText(this@LoginActivity, "Please Check Your Data Filled correct", Toast.LENGTH_LONG).show()
                }else if(login.getStatus()=="success"){
                    var preference : SharedPreferences = getSharedPreferences("Settings", Context.MODE_PRIVATE)
                    val editor = preference.edit()
                    editor.putString(R.string.auth_token.toString(), login.token)
                    editor.commit()
                    startActivity(Intent(this@LoginActivity, MainActivity::class.java))
                    finish()
                }
            }

            override fun onFailure(call: Call<Login>?, t: Throwable?) {
                Toast.makeText(this@LoginActivity, "Please check your internet connection", Toast.LENGTH_LONG).show()
            }

        })
    }
}