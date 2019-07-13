package com.readme.view.home

import android.support.v4.app.Fragment
import android.util.Log

class HomeFragment : Fragment {


    val modelize = ViewModelProviders.of(this).get(DataBukuViewModel::class.java)
    modelize.datadata.observeForever {
        Log.e("TAGERROR", it.get(0).judul)
        dataBukuAdapter = DataBukuAdapters(this@MainActivity, it)
        rcView!!.adapter = dataBukuAdapter
    }
}