package xyz.baal.app.today;

import android.os.Bundle;
import android.view.KeyEvent;

import org.apache.cordova.*;

public class MainActivity extends DroidGap {

    @Override
	public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //setContentView(R.layout.activity_main);
        super.loadUrl("file:///android_asset/www/index.html");
    }
	 public boolean onKeyUp(int keyCode, KeyEvent event){
	        
	        if (keyCode == KeyEvent.KEYCODE_BACK) {
	        	super.loadUrl("file:///android_asset/www/index.html");
	            return true;
	        }else{
	            return super.onKeyUp(keyCode, event);
	        }
	    }
}
