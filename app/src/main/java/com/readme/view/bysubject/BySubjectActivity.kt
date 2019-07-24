package com.readme.view.bysubject

import android.content.Intent
import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.util.Log
import android.view.View
import android.widget.Toast
import com.readme.R
import com.readme.data.model.Articles
import com.readme.service.api.ApiClient
import com.readme.service.api.OnlyApi
import com.readme.view.detail.ArticleDetailActivity
import kotlinx.android.synthetic.main.activity_by_subject.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class BySubjectActivity : AppCompatActivity(), BySubjectAdapter.OnItemClickListener {

    private lateinit var articles : List<Articles>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_by_subject)

        val onlyApi : OnlyApi = ApiClient.getClient().create(OnlyApi::class.java)
        val i = intent
        subjectName.text = i.getStringExtra("name")
        val id = i.getSerializableExtra("id")
        getArticleBySubjectId(onlyApi, id.toString())
        backBtnsubject.setOnClickListener {
            onBackPressed()

        }
    }

    private fun getArticleBySubjectId(onlyApi: OnlyApi, id: String) {
        val call : Call<List<Articles>> = onlyApi.getArticleBySubjectId(id)
        call.enqueue(object : Callback<List<Articles>> {
            override fun onFailure(call: Call<List<Articles>>?, t: Throwable?) {
                Toast.makeText(this@BySubjectActivity, "Please check your internet connection", Toast.LENGTH_LONG).show()
            }

            override fun onResponse(call: Call<List<Articles>>?, response: Response<List<Articles>>?) {
                articles = response?.body()!!
                Log.d("TAG", "BySubjectId size ${articles}")
                if (articles.isEmpty()){
                    Toast.makeText(this@BySubjectActivity, "The item doesn't yet exist", Toast.LENGTH_LONG).show()
                }
                populateArticleList(articles)


            }

        })
    }

    private fun populateArticleList(articles: List<Articles>) {
        rcViewSubject.adapter = BySubjectAdapter(articles, this@BySubjectActivity)
    }

    override fun onItemClickBySubject(articles: Articles, itemView: View) {
        val i = Intent(this@BySubjectActivity, ArticleDetailActivity::class.java);
        i.putExtra("id", articles.id)
        startActivity(i)
    }

}