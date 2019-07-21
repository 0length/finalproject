package com.readme.view.home

import android.support.annotation.NonNull
import android.support.v7.widget.RecyclerView
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import com.readme.R
import com.readme.data.model.Subjects
import com.readme.service.api.BaseUrl
import com.squareup.picasso.Picasso

class SubjectListAdapter (
    private val subjects : List<Subjects>,
    private val clickListener: OnItemClickListener
    ) : RecyclerView.Adapter<RecyclerView.ViewHolder>(){


        interface OnItemClickListener{
            fun onItemClickSubject(subjects: Subjects, itemView : View)
        }

        override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): RecyclerView.ViewHolder {
            val view = LayoutInflater.from(parent.context)
                .inflate(R.layout.subjects_layout_list_item, parent, false)
            return ViewHolder(view)
        }

        override fun getItemCount(): Int {
            return subjects.size
        }

        override fun onBindViewHolder(@NonNull holder: RecyclerView.ViewHolder, position: Int) {
            (holder as ViewHolder).bind(subjects[position], clickListener)
            holder.Name.text = subjects.get(position).getName().toString()
            Picasso.get().load(BaseUrl.baseUrl+subjects.get(position).getImageUrl()).into(holder.Icon)
        }

        class ViewHolder(@NonNull itemView: View) : RecyclerView.ViewHolder(itemView){


            var Icon: ImageView = itemView.findViewById(R.id.imgViewS_Icon)
            var Name : TextView = itemView.findViewById(R.id.txtViewS_Name)
            fun bind(subject: Subjects, listener: OnItemClickListener) = with(itemView)

            {
                setOnClickListener {
                    listener.onItemClickSubject(subject, it)
                }
            }
        }

    }