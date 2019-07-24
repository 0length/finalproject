package com.readme

import android.animation.AnimatorInflater
import android.animation.AnimatorSet
import android.support.v7.app.AppCompatActivity
import android.content.Intent
import android.os.Bundle
import com.readme.view.auth.LoginActivity
import kotlinx.android.synthetic.main.splash.*


class StartApp : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.splash)
        val myThread = object : Thread() {
            override fun run() {
                try {
                    sleep(1200)
                    val intent = Intent(applicationContext, LoginActivity::class.java)
                    startActivity(intent)
                    finish()
                } catch (e: InterruptedException) {
                    e.printStackTrace()
                }

            }
        }
        val rocketAnim = AnimatorInflater.loadAnimator(this,
            R.animator.jump_and_blink) as AnimatorSet
        rocketAnim.setTarget(logo)



        val bothAnimSet = AnimatorSet()
        bothAnimSet.playTogether(rocketAnim)
        bothAnimSet.duration = 2500L
        bothAnimSet.start()

        myThread.start()
    }

}