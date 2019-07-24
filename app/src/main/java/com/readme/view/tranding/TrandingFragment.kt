package com.readme.view.tranding

import android.content.Intent
import android.os.Bundle
import android.support.v4.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import com.readme.R
import com.readme.data.model.Articles
import com.readme.service.api.ApiClient
import com.readme.service.api.OnlyApi
import com.readme.view.detail.ArticleDetailActivity
import kotlinx.android.synthetic.main.fragment_tranding.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class TrandingFragment : Fragment(), TrandingAdapter.onItemClickTrandingArticle {


    private lateinit var articles : List<Articles>

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        return inflater.inflate(R.layout.fragment_tranding, container, false)
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        val onlyApi : OnlyApi = ApiClient.getClient().create(OnlyApi::class.java)
        getPopularArticle(onlyApi)
    }

    private fun getPopularArticle(onlyApi : OnlyApi) {
        val call : Call<List<Articles>> = onlyApi.getPopularArticle()
        call.enqueue(object : Callback<List<Articles>> {
            override fun onFailure(call: Call<List<Articles>>, t: Throwable?) {
                Toast.makeText(context, "Please check your internet connection", Toast.LENGTH_LONG).show()
            }

            override fun onResponse(call: Call<List<Articles>>, response: Response<List<Articles>>?) {
                articles = response?.body()!!
                if (articles.isEmpty()){
                    Toast.makeText(context, "Nothing Found", Toast.LENGTH_LONG).show()
                }
                populateArticleList(articles)
            }

        })
    }
    private fun populateArticleList(articles: List<Articles>) {
        rcViewTranding.adapter = TrandingAdapter(articles, this)
    }

    override fun onItemClickTrandingArticle(articles: Articles, itemView: View) {
        val i = Intent(context, ArticleDetailActivity::class.java);
        i.putExtra("id", articles.id)
        startActivity(i)
    }

}

