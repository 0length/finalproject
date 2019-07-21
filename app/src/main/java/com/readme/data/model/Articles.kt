package com.readme.data.model

import com.google.gson.annotations.Expose
import com.google.gson.annotations.SerializedName

class Articles {
    @SerializedName("id")
    @Expose
    internal var id: String? = null
    @SerializedName("subject_id")
    @Expose
    private var subject_id: String? = null
//    @SerializedName("author_id")
//    @Expose
//    private var author_id: String? = null
    @SerializedName("title")
    @Expose
    private var title: String? = null
    @SerializedName("img_url")
    @Expose
    private var img_url: String? = null
    @SerializedName("text_content")
    @Expose
    private var text_content: String? = null
    @SerializedName("published_at")
    @Expose
    private var published_at: String? = null
    @SerializedName("created_at")
    @Expose
    private var created_at: String? = null
    @SerializedName("updated_at")
    @Expose
    private var updated_at: String? = null

    fun getId(): String? {
        return id
    }

    fun getSubjectId(): String? {

        return subject_id
    }
//    fun getAuthorId(): String? {
//
//        return author_id
//    }

    fun getTitle(): String? {
        return title
    }

    fun getImageUrl(): String? {
        return img_url
    }

    fun getTextContent(): String? {
        return text_content
    }

    fun getPublishedAt(): String? {
        return published_at
    }

    fun getCreatedAt(): String? {
        return created_at
    }

    fun getUpdatedAt(): String? {
        return updated_at
    }

}