import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.RandomAccessFile;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

//文件下载线程
class DownloadThread extends Thread {
    int start, end,threadId;
    File file = null;
    URL url = null;

    public DownloadThread(int threadId,int block, File file, URL url) {
        this.threadId = threadId;
        start = block * threadId;
        end = block * (threadId + 1) - 1;
        this.file = file;
        this.url = url;
    }

    public void run() {
        try {
            //获取连接并设置相关属性。
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            conn.setReadTimeout(5000);
            //此步骤是关键。
            conn.setRequestProperty("Range", "bytes=" + start + "-" + end);
            if (conn.getResponseCode() == 206) {
                RandomAccessFile raf = new RandomAccessFile(file, "rw");
                //移动指针至该线程负责写入数据的位置。
                raf.seek(start);
                //读取数据并写入
                InputStream inStream = conn.getInputStream();
                byte[] b = new byte[1024];
                int len = 0;
                while ((len = inStream.read(b)) != -1) {
                    raf.write(b, 0, len);
                }
                System.out.println("线程"+threadId+"下载完毕");
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
