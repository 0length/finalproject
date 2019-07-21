package com.readme

import android.app.Application
import com.readme.data.MainRepo

class StartApp :Application() {

    fun getMainRepo() = MainRepo(this)
}