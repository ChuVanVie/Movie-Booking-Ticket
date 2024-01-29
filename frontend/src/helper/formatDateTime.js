export const formatDateOfBirth = (inputDateString) => {
    const originalDate = new Date(inputDateString);

    const year = originalDate.getFullYear();
    const month = String(originalDate.getMonth() + 1).padStart(2, "0");
    const day = String(originalDate.getDate()).padStart(2, "0");
    const hours = String(originalDate.getHours()).padStart(2, "0");
    const minutes = String(originalDate.getMinutes()).padStart(2, "0");
    const seconds = String(originalDate.getSeconds()).padStart(2, "0");

    const formattedDateString = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    return formattedDateString;
};
// Time post/ comment
export const formatTimeAgo = (timestamp) => {
    const commentTime = new Date(timestamp);
    const currentTime = new Date();
    const timeDifferenceInMilliseconds = currentTime - commentTime;
    const timeDifferenceInSeconds = Math.floor(
        timeDifferenceInMilliseconds / 1000
    );

    if (timeDifferenceInSeconds < 60) {
        return `${timeDifferenceInSeconds} giây trước`;
    } else if (timeDifferenceInSeconds < 3600) {
        const minutes = Math.floor(timeDifferenceInSeconds / 60);
        return `${minutes} phút trước`;
    } else if (timeDifferenceInSeconds < 86400) {
        const hours = Math.floor(timeDifferenceInSeconds / 3600);
        return `${hours} giờ trước`;
    } else {
        const days = Math.floor(timeDifferenceInSeconds / 86400);
        return `${days} ngày trước`;
    }
};

export const formatDate = (time) => {
    const originalDate = new Date(time);

    const year = originalDate.getFullYear();
    const month = String(originalDate.getMonth() + 1).padStart(2, "0");
    const day = String(originalDate.getDate()).padStart(2, "0");
    return `${day}/${month}/${year}`;
};