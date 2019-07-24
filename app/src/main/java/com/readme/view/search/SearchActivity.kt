package com.readme.view.search

import android.content.Intent
import android.os.Bundle
import android.os.Handler
import android.support.v7.app.AppCompatActivity
import android.support.v7.widget.SearchView
import android.view.View
import android.widget.Toast
import com.madapps.liquid.LiquidRefreshLayout
import com.readme.R
import com.readme.data.model.Articles
import com.readme.service.api.ApiClient
import com.readme.service.api.OnlyApi
import com.readme.view.detail.ArticleDetailActivity
import kotlinx.android.synthetic.main.activity_search.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response




class SearchActivity : AppCompatActivity(), SearchAdapter.onItemClickSearchArticle{

    private lateinit var articles : List<Articles>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_search)
        val onlyApi : OnlyApi = ApiClient.getClient().create(OnlyApi::class.java)
        searchView.setOnQueryTextListener(object : SearchView.OnQueryTextListener {

            override fun onQueryTextSubmit(s: String): Boolean {
                val keyword = searchView.query.toString()
                getArticlebyKeyword(onlyApi, keyword)
                return false
            }

            override fun onQueryTextChange(s: String): Boolean {
                val keyword = searchView.query.toString()
                if (keyword.isEmpty()){

                }else{
                getArticlebyKeyword(onlyApi, keyword)

                }
                return false
            }
        })


        refreshLayoutSearch.setOnRefreshListener(object : LiquidRefreshLayout.OnRefreshListener {
            override fun completeRefresh() {

            }

            override fun refreshing() {
                val keyword = searchView.query.toString()
                getArticlebyKeyword(onlyApi, keyword)
                Handler().postDelayed({
                    refreshLayoutSearch.finishRefreshing()
                }, 5000)

            }
        })
    }

    private fun getArticlebyKeyword(onlyApi: OnlyApi, keyword: String) {
        val call : Call<List<Articles>> = onlyApi.getArticlebyKeyword(keyword)
        call.enqueue(object : Callback<List<Articles>> {
            override fun onFailure(call: Call<List<Articles>>?, t: Throwable?) {
                Toast.makeText(this@SearchActivity, "Please check your internet connection", Toast.LENGTH_LONG).show()
            }

            override fun onResponse(call: Call<List<Articles>>?, response: Response<List<Articles>>?) {
                articles = response?.body()!!
                if (articles.isEmpty()){
                    Toast.makeText(this@SearchActivity, "Nothing Found", Toast.LENGTH_LONG).show()
                }
                populateArticleList(articles)
            }
        })
    }

    private fun populateArticleList(articles: List<Articles>) {
        rcViewSearch.adapter = SearchAdapter(articles, this@SearchActivity)
    }

    override fun onItemClickSearchArticle(articles: Articles, itemView: View) {
        val i = Intent(this@SearchActivity, ArticleDetailActivity::class.java);
        i.putExtra("id", articles.id)
        startActivity(i)
    }
}
