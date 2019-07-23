package com.readme.view.detail

import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.util.Log
import android.widget.ImageView
import android.widget.Toast
import com.readme.R
import com.readme.data.model.Articles
import com.readme.service.api.ApiClient
import com.readme.service.api.BaseUrl
import com.readme.service.api.OnlyApi
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_detail_article.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ArticleDetailActivity : AppCompatActivity() {
    private lateinit var article : Articles
    private lateinit var imagePoster : ImageView
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail_article)
        imagePoster =  findViewById(R.id.imagePoster)
        val onlyApi : OnlyApi = ApiClient.getClient().create(OnlyApi::class.java)
        val i = intent
        val id = i.getSerializableExtra("id")
        getDetailArticle(onlyApi, id.toString())
        backBtn.setOnClickListener {
            onBackPressed()

        }

    }

    private fun getDetailArticle(onlyApi: OnlyApi, id: String) {
        val call : Call<Articles> = onlyApi.getArticlebyid(id)
        call.enqueue(object : Callback<Articles>{
            override fun onFailure(call: Call<Articles>?, t: Throwable?) {
                 Toast.makeText(this@ArticleDetailActivity, "Please check your internet connection", Toast.LENGTH_LONG).show()
            }

            override fun onResponse(call: Call<Articles>?, response: Response<Articles>?) {
                article = response?.body()!!
                Log.d("TAG", "Detail size ${article}")
                collapseToolbar.title = article.getTitle()
                textView_title.text =  article.getTitle()
                textView_published.text =  article.getPublishedAt()
                Picasso.get().load(BaseUrl.baseUrl+article.getImageUrl()).into(imagePoster)
                text_content.text = article.getTextContent()


            }

        })
    }
}

