package com.readme.view.home

import android.support.v7.widget.RecyclerView
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import com.readme.R
import com.readme.data.model.Articles
import com.readme.service.api.BaseUrl
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.articles_layout_list_item.view.*

class ArticleListAdapter (
    private val articles : List<Articles>,
    private val clickListener: OnItemClickListener
    ) : RecyclerView.Adapter<RecyclerView.ViewHolder>(){


        interface OnItemClickListener{
            fun onItemClickArticle(articles: Articles, itemView : View)
        }

        override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): RecyclerView.ViewHolder {
            val view = LayoutInflater.from(parent.context)
                .inflate(R.layout.articles_layout_list_item, parent, false)
            return ViewHolder(view)
        }

        override fun getItemCount(): Int {
            return articles.size
        }

        override fun onBindViewHolder(holder: RecyclerView.ViewHolder, position: Int) {
            (holder as ViewHolder).bind(articles[position], clickListener)
            Picasso.get().load(BaseUrl.baseUrl+articles.get(position).getImageUrl()).into(holder.poster)
        }

        class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView){
            var poster: ImageView = itemView.findViewById(R.id.mvPoster)

            fun bind(articles: Articles, listener: OnItemClickListener) = with(itemView) {
                txtATitle.text = articles.getTitle().toString()
                txtADate.text = articles.getPublishedAt().toString()
                visitCount.text = articles.getViewCount().toString()

                setOnClickListener {
                    listener.onItemClickArticle(articles, it)
                }
            }
        }

    }