@extends('front.layouts.app')

@section('content')
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row">
                <div class="pm-footer-social-info-container">
                    <h6>NHIRE AGENTS</h6>
                </div>
                <div class="col-md-12 aboutus">
                    <h3>Pre-Requisites</h3>
                    <p>The course consists of an approximately equal mixture of lecture and hands-on lab time. The
                        course assumes that all students already have at least moderate previous Java experience,
                        but not necessarily any experience with Hadoop or cloud computing. Although the course will
                        use Java 7, previous experience with earlier Java versions is sufficient. However, the
                        course will definitely move too fast for those with little or no previous experience with
                        Java. Working knowledge of XML is helpful but not absolutely required.</p>
                </div>
                <div class="col-md-12 aboutus">
                    <h3>Benifits</h3>
                    <h2>cost effective</h2>
                    <p>Hadoop also offers a cost effective storage solution for businesses' exploding data sets. The
                        problem with traditional relational database management systems is that it is extremely cost
                        prohibitive to scale to such a degree in order to process such massive volumes of data. In
                        an effort to reduce costs, many companies in the past would have had to down-sample data and
                        classify it based on certain assumptions as to which data was the most valuable. The raw
                        data would be deleted, as it would be too cost-prohibitive to keep. While this approach may
                        have worked in the short term, this meant that when business priorities changed, the
                        complete raw data set was not available, as it was too expensive to store. Hadoop, on the
                        other hand, is designed as a scale-out architecture that can affordably store all of a
                        company's data for later use. The cost savings are staggering: instead of costing thousands
                        to tens of thousands of pounds per terabyte, Hadoop offers computing and storage
                        capabilities for hundreds of pounds per terabyte.</p>
                </div>
                <div class="col-md-12 aboutus">
                    <h2>Flexible</h2>
                    <p>Hadoop enables businesses to easily access new data sources and tap into different types of
                        data (both structured and unstructured) to generate value from that data. This means
                        businesses can use Hadoop to derive valuable business insights from data sources such as
                        social media, email conversations or clickstream data. In addition, Hadoop can be used for a
                        wide variety of purposes, such as log processing, recommendation systems, data warehousing,
                        market campaign analysis and fraud detection.</p>
                </div>
                <div class="col-md-12 aboutus">
                    <h2>Fast</h2>
                    <p>Hadoop's unique storage method is based on a distributed file system that basically 'maps'
                        data wherever it is located on a cluster. The tools for data processing are often on the
                        same servers where the data is located, resulting in much faster data processing. If you're
                        dealing with large volumes of unstructured data, Hadoop is able to efficiently process
                        terabytes of data in just minutes, and petabytes in hours.</p>
                </div>
                <div class="col-md-12 aboutus">
                    <h2>Resilient to failure</h2>
                    <p>A key advantage of using Hadoop is its fault tolerance. When data is sent to an individual
                        node, that data is also replicated to other nodes in the cluster, which means that in the
                        event of failure, there is another copy available for use.The MapR distribution goes beyond
                        that by eliminating the NameNode and replacing it with a distributed No NameNode
                        architecture that provides true high availability. Our architecture provides protection from
                        both single and multiple failures.When it comes to handling large data sets in a safe and
                        cost-effective manner, Hadoop has the advantage over relational database management systems,
                        and its value for any size business will continue to increase as unstructured data continues
                        to grow.</p>
                </div>
                <div class="col-md-12 aboutus">
                    <div class="pm-footer-social-info-container">
                        <h6>Big Data</h6>
                    </div>
                    <h3>Pre-Requisites</h3>
                    <p>Hadoop is just a framework that is being used in Big Data. And yes it is used quite a lot or
                        if i can say it is one of the integral part of Big Data. But beside Hadoop there are tons of
                        tools and technologies that comes under the same. To name a few we have,cassandra,Hbase,
                        MongoDB,CouchDB,Accumulo,HCatlog,Hive,sqoop.ow if we look at the NoSql Databases (that's
                        what we call databases handling unstructured data in Big Data) and different tools,
                        mentioned above, most of them (few being exception) is written in JAVA including Hadoop. So
                        as a programmer if you want to know and go in depth of the architectural APIs, Core Java is
                        the recommended programming language that will help you to grasp the technology in a better
                        and more efficient way.</p>
                    <p>Working directly with Java APIs can be tedious and error prone. It also restricts usage of
                        Hadoop to Java programmers. Hadoop offers two solutions for making Hadoop programming
                        easier.<br>
                        Pig is a programming language that simplifies the common tasks of working with Hadoop:
                        loading data, expressing transformations on the data, and storing the final results. Pig's
                        built-in operations can make sense of semi-structured data, such as log files, and the
                        language is extensible using Java to add support for custom data types and transformations.
                        <br>
                        Hive enables Hadoop to operate as a data warehouse. It superimposes structure on data in
                        HDFS and then permits queries over the data using a familiar SQL-like syntax. As with Pig,
                        Hive's core capabilities are extensible. <br><br>
                        Choosing between Hive and Pig can be confusing. Hive is more suitable for data warehousing
                        tasks, with predominantly static structure and the need for frequent analysis. Hive's
                        closeness to SQL makes it an ideal point of integration between Hadoop and other business
                        intelligence tools.
                    </p>
                </div>
                <div class="col-md-12 aboutus">
                    <h3>Benifits</h3>
                    <p>Re-develop your products<br><br>
                        Perform risk analysis<br><br>
                        Keeping your data safe<br><br>
                        Create new revenue streams<br><br>
                        Customize your website in real time<br><br>
                        Reducing maintenance costs<br><br>
                        Making our cities smartere</p>
                </div>
            </div>
        </div>
    </div>
@endsection
