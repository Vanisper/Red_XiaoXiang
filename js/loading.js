/*loading.js*/

// 加载HTML图
var _LoadingHtml = `
<div id="loading">
    <main>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <!-- <span></span> -->
    </main>
</div>
`

// 呈现loading效果
document.write(_LoadingHtml)

// 监听加载状态改变
document.onreadystatechange = completeLoading

// 加载状态为complete时移除loading效果
function completeLoading() {
  if (document.readyState == 'complete') {
    var loadingMask = document.getElementById('loading')
    loadingMask.parentNode.removeChild(loadingMask)
  }
  console.log(
    '来自loading.js的问候,由于网站部分资源失效,所以将loading遮罩的相关代码去除(不这样做的话,这个遮罩将显示非常长的时间)',
  )
}
