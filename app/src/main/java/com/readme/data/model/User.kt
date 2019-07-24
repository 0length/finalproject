package com.readme.data.model

import com.google.gson.annotations.Expose
import com.google.gson.annotations.SerializedName

class User {
    @SerializedName("id")
    @Expose
    internal var id: String? = null
    @SerializedName("name")
    @Expose
    internal var name: String? = null
    @SerializedName("email")
    @Expose
    private var email: String? = null
    @SerializedName("email_verified_at")
    @Expose
    private var email_verified_at: String? = null
    @SerializedName("created_at")
    @Expose
    private var created_at: String? = null
    @SerializedName("updated_at")
    @Expose
    private var updated_at: String? = null

    fun getName() : String? {
        return name
    }

    fun getEmail() : String? {
        return email
    }

    fun getJoinedDate() : String? {
        return created_at
    }
}