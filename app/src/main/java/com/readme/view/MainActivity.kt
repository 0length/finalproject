package com.readme.view

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.support.design.widget.CoordinatorLayout
import android.support.design.widget.Snackbar
import android.support.v4.app.Fragment
import android.support.v4.view.ViewPager
import android.view.View
import android.widget.Toast
import com.readme.R
import com.readme.view.home.HomeFragment
import com.readme.view.profile.ProfileFragment
import com.readme.view.search.SearchActivity
import com.readme.view.tranding.TrandingFragment
import eu.long1.spacetablayout.SpaceTabLayout
import kotlinx.android.synthetic.main.activity_main.*
import java.util.ArrayList

class MainActivity : AppCompatActivity() {

     lateinit var tabLayout: SpaceTabLayout

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        //add the fragments you want to display in a List
        val fragmentList = ArrayList<Fragment>()
        fragmentList.add(HomeFragment())
        fragmentList.add(TrandingFragment())
        fragmentList.add(ProfileFragment())
//        fragmentList.add(FragmentD())

        val coordinatorLayout = findViewById<CoordinatorLayout>(R.id.activity_main)

        val viewPager = findViewById<ViewPager>(R.id.viewPager)
        tabLayout = findViewById<SpaceTabLayout>(R.id.spaceTabLayout)

        tabLayout.initialize(viewPager, supportFragmentManager, fragmentList)

        tabLayout.tabOneOnClickListener = View.OnClickListener {
            val snackbar = Snackbar
                .make(coordinatorLayout, "Welcome to Readme App", Snackbar.LENGTH_SHORT)

            snackbar.show()
        }

        tabLayout.setOnClickListener {
            Toast.makeText(application, "" + tabLayout.currentPosition, Toast.LENGTH_SHORT).show()
        }

        buttonSearch.setOnClickListener {
            val i  = Intent(this@MainActivity, SearchActivity::class.java)
            startActivity(i)
        }
    }

}
