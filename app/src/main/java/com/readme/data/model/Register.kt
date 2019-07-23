package com.readme.data.model

import com.google.gson.annotations.Expose
import com.google.gson.annotations.SerializedName

class Register {
    @SerializedName("status")
    @Expose
    internal var status: String? = null
    @SerializedName("token")
    @Expose
    internal var token: String? = null

    fun getToken(): String? {
        return token
    }

    fun getStatus(): String? {
        return status
    }
}