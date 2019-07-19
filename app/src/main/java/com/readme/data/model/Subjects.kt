package com.readme.data.model

import com.google.gson.annotations.Expose
import com.google.gson.annotations.SerializedName

class Subjects{
    @SerializedName("id")
    @Expose
    private var id: String? = null
    @SerializedName("name")
    @Expose
    private var name: String? = null
    @SerializedName("img_url")
    @Expose
    private var img_url: String? = null
    @SerializedName("description")
    @Expose
    private var description: String? = null
    @SerializedName("created_at")
    @Expose
    private var created_at: String? = null
    @SerializedName("updated_at")
    @Expose
    private var updated_at: String? = null

    fun getId(): String? {
        return id
    }

    fun getName(): String? {
        return name
    }

    fun getImageUrl(): String? {
        return img_url
    }

    fun getDescription(): String? {
        return description
    }

    fun getCreatedAt(): String? {
        return created_at
    }

    fun getUpdatedAt(): String? {
        return updated_at
    }


}