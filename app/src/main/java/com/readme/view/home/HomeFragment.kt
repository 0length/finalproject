package com.readme.view.home

import android.arch.lifecycle.ViewModelProviders
import android.content.Intent
import android.os.Bundle
import android.support.v4.app.Fragment
import android.support.v7.widget.LinearLayoutManager
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.navigation.findNavController
import com.readme.R
import com.readme.data.model.Articles
import com.readme.data.model.Subjects
import com.readme.view.detail.ArticleDetailActivity
import kotlinx.android.synthetic.main.fragment_home.*

class HomeFragment : Fragment(), ArticleListAdapter.OnItemClickListener, SubjectListAdapter.OnItemClickListener  {


    private lateinit var modelizer : HomeViewModel

            override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
         modelizer = ViewModelProviders.of(this).get(HomeViewModel::class.java)

    }
    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        return inflater.inflate(R.layout.fragment_home, container, false)

    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        modelizer.dataArticle?.observeForever{ articles -> articles?.let {
            populateArticleList(articles)
            Log.i("TAG", "data:"+articles)
        }

        }
        modelizer.dataSubject?.observeForever { subjects -> subjects?.let {
            populateSubjectList(subjects)
            Log.i("TAG", "data:"+subjects)
        }

        }

        val HorizontalLayout = LinearLayoutManager(context, LinearLayoutManager.HORIZONTAL, false);
        rcViewSubject.setLayoutManager(HorizontalLayout)

    }

    private fun populateArticleList(articleList: List<Articles>){
        rcViewArticle.adapter = ArticleListAdapter(articleList, this)
    }

    private fun populateSubjectList(subjectList: List<Subjects>){
        rcViewSubject.adapter = SubjectListAdapter(subjectList, this)
    }

    override fun onItemClickArticle(articles: Articles, itemView: View) {
//        val detailBundle = Bundle().apply{
//            putString(getString(R.string.article_id), articles.id)
//        }
        val i : Intent = Intent(context, ArticleDetailActivity::class.java);
        i.putExtra("id", articles.id)
        startActivity(i)
}

    override fun onItemClickSubject(subjects: Subjects, itemView: View) {
//        val detailBundle = Bundle().apply{
//            putInt(getString(R.string.book_id), book.id)
//        }
//        view?.findNavController()?.navigate(R.id.action2, detailBundle)
    }



}




